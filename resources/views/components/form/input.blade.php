@props(['name','type'=>'text' , 'value' => ''])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input  type="{{$type}}"
            id="{{$name}}"
           name="{{$name}}"
           class="form-control"
           value="{{old($name,$value)}}">
           <x-error :name="$name" />
</x-form.input-wrapper>
