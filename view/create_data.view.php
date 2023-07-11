<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <title>data creating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#dbname").change(function () {
                var aid =$("#dbname").val();
                $.ajax({
                    url:'index.php',
                    method:'post',
                    data:'aid='+aid
                }).done(function (tables) {
                    console.log(tables)
                    tables=JSON.parse(tables)
                    $('#table_name').empty()

                    tables.forEach(function (table) {
                        $('#table_name').append(`<option>${table.tablesname}</option>`);
                        $('#table_name').addClass(`${table.TABLE_SCHEMA}`);
                    })
                })
            })

        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#table_name").change(function () {
                var table =$("#table_name").val();
                var  dbname =$("#table_name").attr("class");
                $.ajax({
                    url:'index.php',
                    method:'post',
                    data:{ table: table, dbname: dbname },
                    // data:'table='+table+','+"dbname="+dbname
                    // data:'table='+table & 'user_id=' + dbname,

                    // data: { table: table,'dbname': dbname,}
                }).done(function (column) {
                    console.log(column)
                    column=JSON.parse(column)
                    tables.forEach(function (column) {
                        $('#column').append('<option id="table.tablesname">'+ table.tablesname + '</option>')
                    })
                })
            })

        })
    </script>

</head>

<body class="h-full">

<form action="/create_data" method="post" enctype="multipart/form-data">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-7 text-2xl font-semibold leading-7 text-gray-900">Add Your values</h2>
            <div class="mt-7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="dbname" class="block text-l font-medium leading-6 text-gray-900">Database</label>
                    <div class="mt-4">
                        <div class="flex rounded-md shadow-l ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <select name="dbname" id="dbname">
                                <option selected="" value="">select</option>
                                <?php foreach ($databaseList as $dbList =>$list): ?>
                                <option id="<?php echo$list->Database?>" value="<?php echo$list->Database?>"><?php echo$list->Database?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="dbname" class="block text-l font-medium leading-6 text-gray-900">Table name</label>

                        <div class="mt-4 flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <select name="table_name" id="table_name">
                                    <option selected value="">select</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4" id ="column">

                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">add your data</button>
</form>

</body>

</html>