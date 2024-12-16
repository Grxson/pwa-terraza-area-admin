<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido otra vez') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Buttons in the middle -->
                <div class="flex justify-center space-x-4 py-6">
                    <table>

                    <tr>
                        <td> <a href="{{url('Order.index')}}"> <img src="kitchen.png" alt=""></a></td>
                        <td><a href="{{url('Products.index')}}"> <img src="dish.png" alt=""></a></td>
                    </tr>

                    <tr>
                        <td><a href="{{url('Employee.index')}}"> <img src="employee.png" alt=""> </a></td>
                        <td><a href="{{url('Coupon.index')}}"> <img src="coupon.png" alt=""> </a></td>
                    </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

<style>
    img{
        width: 200px;
        height: 200px;}
th, td {
  padding: 25px;
}


</style>

</x-app-layout>
