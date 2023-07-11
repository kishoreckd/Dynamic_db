<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <title>database Creating</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="h-full">

<form action="/create_database" method="post" enctype="multipart/form-data">
    <div class="bg-stone-200 w-2/4 ml-80 items-center">
        <?php if(isset($_SESSION['db_name_exists'])) :?>
            <h2 class="  text-xl text-red-500 text-center font-semibold" >This Database name ("<?php echo $_SESSION['db_name_exists'] ?>")   already exists</h2>
        <?php endif; ?>
    </div>

    <h2></h2>
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-7 text-2xl font-semibold leading-7 text-gray-900">Create Your Database</h2>
            <div class="mt-7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="dbname" class="block text-sm font-medium leading-6 text-gray-900">Database</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                            <input type="text" name="dbname" id="dbname" autocomplete="dbname"
                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="DbName">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">Create Database</button>
</form>

</body>

</html>