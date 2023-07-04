<div class="row">
    <h4 style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Permissões para {{$item->name}}</h4>
    <div class="col-sm" style="border: 1px solid #ccc">
        <h4 style="font-size: 100%;padding-top: 10px">Super Usuários</h4>
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
        <h4 style="font-size: 100%;padding-top: 10px">Usuários</h4>
        <hr>
        @foreach($permissions->slice(5, 5) as $permission)
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
        <h4 style="font-size: 100%;padding-top: 10px">Grupos</h4>
        <hr>
        @foreach($permissions->slice(10, 5) as $permission)
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
        <h4 style="font-size: 100%;padding-top: 10px">Permissões</h4>
        <hr>
        @foreach($permissions->slice(15, 5) as $permission)
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
