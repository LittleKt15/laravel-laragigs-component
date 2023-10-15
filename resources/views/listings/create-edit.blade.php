<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">{{ empty($listing->id) ? 'Create' : 'Edit' }} Gig</h2>
            <p class="mb-4">{{ empty($listing->id) ? 'Create an account to post gigs' : 'Edit: ' . $listing->title }}
            </p>
        </header>

        @if (empty($listing->id))
            <form method="POST" action="{{ url('/listings') }}" enctype="multipart/form-data">
            @else
                <form method="POST" action="{{ url('/listings/' . $listing->id) }}" enctype="multipart/form-data">
                    @method('PUT')
        @endif
        @csrf
        <div class="mb-6">
            <label for="company" class="inline-block text-lg mb-2">Company Name</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                value="{{ old('company') ?? $listing->company }}" />

            @error('company')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Job Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                placeholder="Example: Senior Laravel Developer" value="{{ old('title') ?? $listing->title }}" />

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="location" class="inline-block text-lg mb-2">Job Location</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                placeholder="Example: Remote, Boston MA, etc" value="{{ old('location') ?? $listing->location }}" />

            @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">
                Contact Email
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                value="{{ old('email') ?? $listing->email }}" />

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="website" class="inline-block text-lg mb-2">
                Website/Application URL
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                value="{{ old('website') ?? $listing->website }}" />

            @error('website')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ old('tags') ?? $listing->tags }}" />

            @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Company Logo
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

            @if (empty($listing->id))
            @else
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="" />
            @endif

            @error('logo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Job Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                placeholder="Include tasks, requirements, salary, etc">{{ old('description') ?? $listing->description }}</textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black">
                {{ empty($listing->id) ? 'Create' : 'Update' }} Gig
            </button>

            @if (empty($listing->id))
                <a href="/" class="text-black ml-4"> Back </a>
            @else
                <a href="{{ url('listings/' . $listing->id) }}" class="text-black ml-4"> Back </a>
            @endif
        </div>
        </form>
    </x-card>
</x-layout>
