<div class="border-2 border-gray-300 p-5 rounded-lg">
<input type="file" name="image" id="file_input" class="w-full border-gray-200
    bg-gray-50 block focus:outline-none rounded-xl">

<textarea name="description" rows="5"  class="w-full mt-3 border-0 rounded-xl"
placeholder="{{ __('Write a description ...')}}">{{$post->description?? ""}}</textarea>

</div>
