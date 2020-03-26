@component('mail::message')
# A heading

Lorem ipsum dolor sit amet consectetur,
 adipisicing elit. Possimus modi iure facere quae rerum voluptas aliquid dignissimos? Repudiandae magnam aspernatur voluptas, eaque dolorum obcaecati dolores nobis consequuntur asperiores nisi quidem?

- something
- is a list


> this is my stuff {{$topic}}


@component('mail::button', ['url' => 'laravel6.test'])
Visit me
@endcomponent
@endcomponent
