<div class="row">
    <h4 style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">
        Grupos e Permissões para {{$item->name}}</h4>
    <div class="col-sm" style="border: 1px solid #ccc">
        <h4 style="font-size: 100%;padding-top: 10px">Grupos</h4>
        <hr>
        @foreach($roles as $role)
            <div class="form-check form-check-inline">
            <label class="control control--checkbox checkbox-inline">{{ $role->name}}&nbsp;
                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                @forelse($item->roles as $itemRole)
                    {{ $itemRole->id == $role->id ? 'checked' : '' }}
                        @empty

                        @endforelse
                />
                <div class="control__indicator"></div>
            </label>
            </div>
        @endforeach
    </div>
</div>
<br>
