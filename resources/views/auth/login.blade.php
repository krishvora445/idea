<x-layout>
    <x-form title="Log in" subtitle="Glad to see you again!">
        <form action="/login" method="POST" class="mt-6">
            @csrf

                <x-form.field label="Email" type="email" name="email"/>
                <x-form.field label="Password" type="password" name="password"/>

            <button type="submit" data-test="login-test" class="w-full btn">Sing in</button>
        </form>
    </x-form>
</x-layout>
