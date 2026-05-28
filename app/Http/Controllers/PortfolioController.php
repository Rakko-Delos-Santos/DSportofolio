<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    private GitHubService $githubService;

    public function __construct()
    {
        $this->githubService = new GitHubService('Rakko-Delos-Santos');
    }

    /**
     * Display the main portfolio page with GitHub projects
     */
    public function index(): View
    {
        $projects = $this->githubService->getRepositories(6);
        $userProfile = $this->githubService->getUserProfile();

        return view('main', [
            'projects' => $projects,
            'userProfile' => $userProfile,
        ]);
    }
}
