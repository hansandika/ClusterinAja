<div>
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Request Title</label>
    <input type="text" id="title" name="title"
        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Post something..." value="{{ old('title', $request->title ?? '') }}" required>
    @error('title')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Request Type</label>
    <select id="type" name="type"
        class="{{ $errors->first('type') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900  placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 ' }} sm:text-sm rounded-lg block w-full p-2.5">
        <option disabled selected>-- Select Request Type --</option>
        @foreach ($types as $type)
            <option value="{{ $type->id }}"
                {{ $type->id == old('type', $request->request_category_id ?? '') ? 'selected' : '' }}>
                {{ ucfirst($type->name) }}</option>
        @endforeach
    </select>
    @error('type')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Detail
        Description</label>
    <textarea id="description" rows="8" name="description"
        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Your message...">{{ old('description', $request->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
    <select {{ $action == 'Create' ? 'disabled' : '' }} id="status" name="status"
        class="{{ $errors->first('status') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900  placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 ' }} sm:text-sm rounded-lg block w-full p-2.5">
        @if ($action == 'Create')
            <option disabled selected>-- Not Finished --</option>
        @else
            <option value="1" {{ $request->status == 1 ? 'selected' : '' }}>Finished</option>
            <option value="2" {{ $request->status == 2 ? 'selected' : '' }}>In Progress</option>
            <option value="3" {{ $request->status == 3 ? 'selected' : '' }}>Not Finished</option>
        @endif
    </select>
    @error('status')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
    <input name="image"
        class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        aria-describedby="file_input_help" id="file_input" type="file">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPEG, JPG or GIF
    </p>
    @error('image')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $action }}
    Request</button>
