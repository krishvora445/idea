<x-layout>
    <x-form title="Register an account" subtitle="Start tracking your ideas today.">
        <form action="/register" method="POST" class="mt-6">
            @csrf

                <x-form.field label="Name"  name="name"/>
                <x-form.field label="Email" type="email" name="email"/>
                <x-form.field label="Password" type="password" name="password"/>

            <button type="submit" data-test="register-test" class="w-full btn">Register</button>
        </form>
    </x-form>
</x-layout>
