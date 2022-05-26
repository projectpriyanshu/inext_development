<div class="bg-dark search-suggestion">
    @forelse($data as $dataRoow)
    <div class="text-white border-bottom" onclick="searchData('{{$dataRoow->name}}','{{$dataRoow->code}}')">{{$dataRoow->name}}</div>
    @empty
    <div class="text-white border-bottom">No matching Data</div>
    @endforelse
</div>