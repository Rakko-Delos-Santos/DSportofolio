<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

/**
 * GitHub Service
 * 
 * Fetches public repositories from a GitHub user profile
 * and returns formatted project data.
 */
class GitHubService
{
    private const GITHUB_API_BASE = 'https://api.github.com';
    
    private string $username;
    
    public function __construct(string $username = 'Rakko-Delos-Santos')
    {
        $this->username = $username;
    }

    /**
     * Get public repositories for the user
     */
    public function getRepositories(int $limit = 6): Collection
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(10)
                ->get(self::GITHUB_API_BASE . "/users/{$this->username}/repos", [
                    'sort' => 'updated',
                    'direction' => 'desc',
                    'per_page' => $limit * 2,
                    'type' => 'public',
                ]);

            if ($response->failed()) {
                \Log::warning('GitHub API Response Failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return collect([]);
            }

            return $this->formatRepositories($response->collect())->take($limit);
        } catch (\Exception $e) {
            \Log::error('GitHub API Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return collect([]);
        }
    }

    /**
     * Get a specific repository
     */
    public function getRepository(string $repoName): ?array
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(10)
                ->get(self::GITHUB_API_BASE . "/repos/{$this->username}/{$repoName}");

            if ($response->failed()) {
                return null;
            }

            $data = $response->json();
            return $this->formatRepository($data);
        } catch (\Exception $e) {
            \Log::error('GitHub API Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return null;
        }
    }

    /**
     * Get user profile information
     */
    public function getUserProfile(): ?array
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(10)
                ->get(self::GITHUB_API_BASE . "/users/{$this->username}");

            if ($response->failed()) {
                return null;
            }

            return $response->json();
        } catch (\Exception $e) {
            \Log::error('GitHub API Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return null;
        }
    }

    /**
     * Format repositories data
     */
    private function formatRepositories(Collection $repos): Collection
    {
        return $repos
            ->map(fn($repo) => $this->formatRepository($repo))
            ->values();
    }

    /**
     * Format single repository data
     */
    private function formatRepository(array $repo): array
    {
        return [
            'id' => $repo['id'],
            'name' => $repo['name'],
            'title' => $repo['name'],
            'description' => $repo['description'] ?? 'No description provided',
            'url' => $repo['html_url'],
            'language' => $repo['language'] ?? 'N/A',
            'stars' => $repo['stargazers_count'] ?? 0,
            'forks' => $repo['forks_count'] ?? 0,
            'updated_at' => $repo['updated_at'],
            'topics' => $repo['topics'] ?? [],
            'homepage' => $repo['homepage'],
        ];
    }

    /**
     * Get languages used in repositories
     */
    public function getLanguagesFromRepos(int $limit = 6): Collection
    {
        $repos = $this->getRepositories($limit);
        
        return $repos
            ->pluck('language')
            ->filter()
            ->unique()
            ->values();
    }
}
