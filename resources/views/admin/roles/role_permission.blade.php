@extends('layouts.admin')

@section('content')
    <div class="p-4 sm:ml-64  h-[100vh] bg-gray-100">
        <div class="p-4  mt-14 ">
            <h1>Role Permission</h1>
            <form action="" class="w-full mx-auto">
                <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign to</label>
                <select id="permission" name="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Choose a permission</option>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach

                </select>
                <button type="submit" class="w-full focus:outline-none mt-4 text-white bg-cyan-800 hover:bg-cyan-900 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Purple</button>
            </form>
        </div>
    </div>
@endsection
