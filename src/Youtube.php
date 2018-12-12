<?php

namespace Kolpikov\Youtube;

use Kolpikov\Youtube\Exceptions\YoutubeException;

/**
 * Class Youtube
 * @package Kolpikov\Youtube
 */
class Youtube
{
    /**
     * @var array
     */
    private $youtubeApiEndpoins = [
        'videos.list' => 'https://www.googleapis.com/youtube/v3/videos',
        'playlistItems.list' => 'https://www.googleapis.com/youtube/v3/playlistItems',
    ];

    /**
     * @var int
     */
    private $maxResults = 50;

    /**
     * @var string
     */
    private $youtubeAppKey;

    /**
     * Youtube constructor.
     *
     * @param string $key
     * @throws YoutubeException
     */
    public function __construct(string $key)
    {
        if (empty($key)) {
            throw new YoutubeException("Youtube API key is Required!");
        }

        $this->youtubeAppKey = $key;
    }

    /**
     * @param string $playListID
     * @param array $part
     * @return array
     */
    public function getPlaylistItems(string $playListID, array $part = []): array
    {
        $params = [
            'part' => $this->buildPartField($part, 'snippet'),
            'key' => $this->getYoutubeAppKey(),
            'maxResults' => $this->getMaxResults(),
            'playlistId' => $playListID,
        ];

        $requestUrl = $this->buildRequestUrl(
            $this->youtubeApiEndpoins['playlistItems.list'],
            $params
        );

        $results = $this->getResponseData($requestUrl);

        return $results;
    }

    /**
     * @param string $id
     * @param array $part
     * @return array
     */
    public function getContentDetails(string $id, array $part = []): array
    {
        $params = [
            'part' => $this->buildPartField($part, 'contentDetails'),
            'key' => $this->getYoutubeAppKey(),
            'id' => $id,
        ];

        $requestUrl = $this->buildRequestUrl(
            $this->youtubeApiEndpoins['videos.list'],
            $params
        );

        $results = $this->getResponseData($requestUrl, false);

        return $results;
    }

    /**
     * @param string $id
     * @return string
     */
    public function getVideoLength(string $id): string
    {
        $results = $this->getContentDetails($id);

        if (!empty($results[0]['contentDetails']['duration'])) {
            return $results[0]['contentDetails']['duration'];
        }

        return '';
    }

    /**
     * @param array $part
     * @param string $default
     * @return string
     */
    private function buildPartField(array $part, string $default): string
    {
        return !empty($part) ? implode(',', $part) : $default;
    }

    /**
     * @return string
     */
    private function getYoutubeAppKey(): string
    {
        return $this->youtubeAppKey;
    }

    /**
     * @return int
     */
    private function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * @param string $endPoint
     * @param array $params
     * @return string
     */
    private function buildRequestUrl(string $endPoint, array $params = []): string
    {
        if (strpos($endPoint, '?') === false) {
            $endPoint .= '?';
        }

        return $endPoint . http_build_query($params);
    }

    /**
     * @param string $requestUrl
     * @param bool $followPagination
     * @return array
     */
    private function getResponseData(string $requestUrl, $followPagination = true): array
    {
        $results = [];
        $response = $this->sendRequest($requestUrl);

        if (!empty($response['items'])) {
            $results = $response['items'];
        }

        while ($followPagination && $this->responseHasNextPageToken($response)) {
            $response = $this->sendRequest(
                $this->buildRequestUrl($requestUrl . "&", ['pageToken' => $response['nextPageToken']])
            );

            if (!empty($response['items'])) {
                $results = array_merge($results, $response['items']);
            }
        }

        return $results;
    }

    /**
     * @param string $url
     * @return array
     */
    private function sendRequest(string $url): array
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response
            ? json_decode($response, true)
            : [];
    }

    /**
     * @param $response
     * @return bool
     */
    private function responseHasNextPageToken($response): bool
    {
        if (!empty($response['nextPageToken'])) {
            return true;
        }

        return false;
    }
}
