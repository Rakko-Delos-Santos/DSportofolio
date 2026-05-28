# GitHub Integration Guide

Your portfolio now automatically fetches and displays your GitHub projects from your public repositories.

## How It Works

1. **GitHubService** (`app/Services/GitHubService.php`) - Fetches repositories from the GitHub API
2. **PortfolioController** (`app/Http/Controllers/PortfolioController.php`) - Retrieves and passes data to the view
3. **main.blade.php** - Displays projects dynamically with real GitHub data

## Current Configuration

- **GitHub Username:** `Rakko-Delos-Santos`
- **Projects Displayed:** 6 most recently updated repositories
- **Excludes:** Forks

## Features

✨ **Automatic Updates** - Projects update when you push to GitHub  
✨ **Rich Data** - Shows language, stars, forks, and description  
✨ **Direct Links** - Each project links to your GitHub repo  
✨ **Topics Support** - Displays repository topics if set in GitHub  
✨ **No API Key Required** - Uses public GitHub API (unauthenticated requests limited to 60/hour)

## Customization

### Change Number of Projects Displayed

In `app/Http/Controllers/PortfolioController.php`, line 19:

```php
// Change from 6 to desired number
$projects = $this->githubService->getRepositories(6);
```

### Change GitHub Username

Option 1: Update constructor in controller
```php
// PortfolioController.php
$this->githubService = new GitHubService('your-username');
```

Option 2: Use environment variable (recommended)
```php
// Add to .env file
GITHUB_USERNAME=your-username

// Update controller
$this->githubService = new GitHubService(
    config('app.github_username', 'Rakko-Delos-Santos')
);

// Add to config/app.php
'github_username' => env('GITHUB_USERNAME', 'Rakko-Delos-Santos'),
```

### Include Forks

In `app/Services/GitHubService.php`, update the `formatRepositories()` method:

```php
// Remove or comment out the fork filter
return $repos
    // ->filter(fn($repo) => !$repo['fork']) // Remove this line
    ->map(fn($repo) => $this->formatRepository($repo))
    ->values();
```

### Sort Projects Differently

In `app/Services/GitHubService.php`, `getRepositories()` method:

```php
// Current: sorted by recently updated
'sort' => 'updated',

// Other options:
'sort' => 'stars',      // Most stars
'sort' => 'forks',      // Most forks
'sort' => 'created',    // Most recently created
```

### Display All Repositories

Replace 6 with a larger number:
```php
$projects = $this->githubService->getRepositories(12); // Show 12 projects
```

## Project Card Display

Each project shows:

- **Project Number** - Auto-numbered (01, 02, 03, etc.)
- **Thumbnail Color** - Rotates between navy, light, and mid tones
- **Language** - Primary language used in the repo
- **Topics** - First 2 topics (if set on GitHub)
- **Title** - Repository name
- **Description** - First 80 characters of repo description
- **Stars** - Number of GitHub stars (if > 0)
- **Forks** - Number of forks (if > 0)

## GitHub Profile Data

Additional profile data is fetched but not displayed. You can use it:

```php
// In PortfolioController
$userProfile = $this->githubService->getUserProfile();

// Available data:
// - $userProfile['public_repos'] - Total public repos
// - $userProfile['followers'] - GitHub followers
// - $userProfile['following'] - Following count
// - $userProfile['bio'] - GitHub bio
// - $userProfile['location'] - Location
// - $userProfile['blog'] - Website
```

## Error Handling

If GitHub API is unavailable:
- A placeholder message appears instead of breaking the page
- Errors are logged to `storage/logs/laravel.log`
- The site continues to function

## Performance

- API calls are made on every page load (no caching by default)
- Add caching for better performance:

```php
// In PortfolioController
public function index(): View
{
    $projects = cache()->remember('github-projects', 3600, function () {
        return $this->githubService->getRepositories(6);
    });

    $userProfile = cache()->remember('github-profile', 3600, function () {
        return $this->githubService->getUserProfile();
    });

    return view('main', [
        'projects' => $projects,
        'userProfile' => $userProfile,
    ]);
}
```

## Useful Links

- **Your GitHub Profile:** https://github.com/Rakko-Delos-Santos
- **GitHub API Docs:** https://docs.github.com/en/rest
- **GitHub API User Endpoint:** https://api.github.com/users/Rakko-Delos-Santos

## Testing

Test the GitHub service in tinker:

```bash
php artisan tinker
```

```php
$gh = new App\Services\GitHubService('Rakko-Delos-Santos');
$repos = $gh->getRepositories(3);
$repos->each(fn($r) => echo $r['name'] . "\n");
```

## Troubleshooting

**Projects not showing?**
- Check `storage/logs/laravel.log` for errors
- Ensure your GitHub profile is public
- Verify username is correct
- Check API rate limit: https://api.github.com/rate_limit

**API rate limit exceeded?**
- Use a Personal Access Token (no authentication required for public data)
- Implement caching (see Performance section above)
- Wait 1 hour for limit to reset

**Want to use GitHub API Token?**

Add to `.env`:
```
GITHUB_TOKEN=your_personal_access_token
```

Update `GitHubService.php`:
```php
$response = Http::withToken(config('services.github.token'))
    ->timeout(10)
    ->get(...);
```

## Next Steps

1. ✅ Projects are displaying from GitHub
2. 📝 Consider adding project descriptions in GitHub repo descriptions
3. 🏷️ Add GitHub topics to your repos for better categorization
4. ⭐ Encourage stars on GitHub projects
5. 💾 Enable caching if experiencing rate limits
