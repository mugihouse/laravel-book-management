<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    index<br>
                    <a href="{{route('books.create')}}" class="text-blue-500">新規登録</a><br>
                    {{-- <form class="mb-8" method="get" action="{{ route('contacts.index') }}">
                        <input type="text" name="search" placeholder="検索ワード">
                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>
                    </form> --}}
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">冊数</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">価格</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">出版日</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ $book->id }}</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ $book->item_name }}</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ $book->item_number }}</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ $book->item_amount }}</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">{{ $book->published }}</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">
                                <form method="get" action="{{ route('books.edit', ['id' => $book->id])}}">
                                <div class="p-2 w-full">
                                    <x-primary-button class="">編集</x-primary-button>
                                    </div>
                                </form>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3">
                                <form method="POST" action="{{ route('books.destroy', [ 'id' => $book->id ])}}">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>削除</x-danger-button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
