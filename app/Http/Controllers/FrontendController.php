<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Consultant;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function home(): View
    {
        return view('frontend.home', [
            'services' => Service::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
            'caseStudies' => CaseStudy::query()
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderByDesc('updated_at')
                ->limit(3)
                ->get(),
            'teamMembers' => TeamMember::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(4)
                ->get(),
            'stats' => [
                ['value' => TeamMember::where('is_active', true)->count(), 'suffix' => '', 'label' => 'Tenaga Profesional'],
                ['value' => Consultant::where('is_active', true)->count(), 'suffix' => '', 'label' => 'Konsultan Tersedia'],
                ['value' => Service::where('is_active', true)->count(), 'suffix' => '', 'label' => 'Layanan Utama'],
                ['value' => Article::published()->count(), 'suffix' => '+', 'label' => 'Artikel & Wawasan'],
            ],
        ]);
    }

    public function services(): View
    {
        return view('frontend.layanan', [
            'services' => Service::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function about(): View
    {
        return view('frontend.tentang', [
            'teamMembers' => TeamMember::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function portfolio(): View
    {
        $caseStudies = CaseStudy::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('updated_at')
            ->get();

        return view('frontend.portofolio', [
            'caseStudies' => $caseStudies,
            'industries' => $caseStudies
                ->pluck('industry')
                ->filter()
                ->unique()
                ->values(),
        ]);
    }

    public function blog(Request $request): View
    {
        $category = $request->query('category');

        $articles = Article::published()
            ->when($category, fn ($query) => $query->where('category', $category))
            ->latest('published_at')
            ->get();

        return view('frontend.blog', [
            'articles' => $articles,
            'categories' => $this->categories(),
            'activeCategory' => $category,
            'totalArticles' => Article::published()->count(),
            'latest' => Article::published()->latest('published_at')->limit(3)->get(),
        ]);
    }

    public function career(): View
    {
        return view('frontend.karir');
    }

    public function blogDetail(string $slug): View
    {
        $article = Article::published()->where('slug', $slug)->first();

        $latest = Article::published()
            ->latest('published_at')
            ->when($article, fn ($query) => $query->where('slug', '!=', $article->slug))
            ->limit(3)
            ->get();

        $related = Article::published()
            ->when($article, function ($query) use ($article) {
                $query->where('slug', '!=', $article->slug);

                if ($article->category !== null) {
                    $query->where('category', $article->category);
                }
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        if ($related->isEmpty() && $article !== null) {
            $related = Article::published()
                ->where('slug', '!=', $article->slug)
                ->latest('published_at')
                ->limit(3)
                ->get();
        }

        return view('frontend.blog-detail', [
            'article' => $article,
            'related' => $related,
            'latest' => $latest,
            'categories' => $this->categories(),
        ]);
    }

    /**
     * @return array<int, array{name: string, count: int}>
     */
    private function categories(): array
    {
        return Article::published()
            ->select('category')
            ->whereNotNull('category')
            ->selectRaw('count(*) as total')
            ->groupBy('category')
            ->orderByDesc('total')
            ->get()
            ->map(fn ($row) => ['name' => $row->category, 'count' => (int) $row->total])
            ->values()
            ->all();
    }
}
