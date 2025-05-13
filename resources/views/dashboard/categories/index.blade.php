<x-layouts.app :title="__('Dashboard')">
<flux:heading>Products Categories</flux:heading>
<flux:text class="mt-2">Selamat datang di product categories. Happy shopping</flux:text>

<flux:button href="{{ route('categories.create') }}" icon="plus" class="mt-4 mb-4">
    Add New Category
</flux:button>

<table class="min-w-full divide-y divide-gray-200 table-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($categories as $key => $category)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <img src="{{ Storage::url($category->image) }}" alt="{{$category->name}}" class="h-10 w-10 rounded-full">
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->slug }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->description }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <flux:dropdown>
                    <flux:button href="{{ route('categories.edit', $category->id) }}" icon="pencil" variant="primary" size="sm">
                        Edit
                    </flux:button>

                    <flux:button href="{{ route('categories.destroy', $category->id) }}" icon="trash" variant="danger" size="sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                        Delete
                    </flux:button>

                    <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </flux:dropdown>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-layouts.app>