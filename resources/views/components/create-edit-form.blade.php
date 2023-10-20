<input type="file" name="image" id="file_input" class="w-full border-gray-200
    bg-gray-50 block focus:outline-none rounded-xl">
<p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG or GIF</p>

<textarea name="description" rows="5"  class="w-full mt-0 border-gray-200 rounded-xl"
placeholder="{{ __('Write a description ...')}}">{{$post->description?? ""}}</textarea>
