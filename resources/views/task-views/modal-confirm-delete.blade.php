@section('content')
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <script>
        function openModal(){
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        function closeModal(){
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
   <div class="bg-white rounded-lg w-1/3 p-6 shadow-lg">
        <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
        <p class="mb-6">Are you sure you want to delete this task? Once done cannot be undone my friend :|</p>

        <div class="flex justify-end space-x-4">
            <button class="bg-gray-300 hover:bg-blue-400 text-gray-800 hover:text-white-800 font-bold py-2 px-4 rounded" onclick="closeModal()">Cancel</button>
            <form action="{{ route('tasks.destroy', $task->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>
   </div>
</div>
@endsection
