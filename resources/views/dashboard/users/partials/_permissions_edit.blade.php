<div class="row">
    <div class="col-sm" style="border: 1px solid #ccc">
        <hr>
        @foreach($permissions->slice(0, 5) as $permission)
            <label class="control control--checkbox">{{ $permission->name}}&nbsp;
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                @forelse($item->permissions as $itemPermission)
                    {{ $itemPermission->id == $permission->id ? 'checked' : '' }}
                        @empty

                        @endforelse
                />
                <div class="control__indicator"></div>
            </label>
        @endforeach
    </div>
    <div class="col-sm" style="border: 1px solid #ccc">
        <hr>
        @foreach($permissions->slice(5, 8) as $permission)
            <label class="control control--checkbox">{{ $permission->name}}&nbsp;
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                @forelse($item->permissions as $itemPermission)
                    {{ $itemPermission->id == $permission->id ? 'checked' : '' }}
                        @empty

                        @endforelse
                />
                <div class="control__indicator"></div>
            </label>
        @endforeach
    </div>
    <div class="col-sm" style="border: 1px solid #ccc">
        <hr>
        @foreach($permissions->slice(13, 5) as $permission)
            <label class="control control--checkbox">{{ $permission->name}}&nbsp;
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                @forelse($item->permissions as $itemPermission)
                    {{ $itemPermission->id == $permission->id ? 'checked' : '' }}
                        @empty

                        @endforelse
                />
                <div class="control__indicator"></div>
            </label>
        @endforeach
    </div>

</div>
<br>
