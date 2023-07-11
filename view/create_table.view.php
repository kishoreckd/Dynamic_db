<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <title>database Creating</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="h-full">

<form action="/create_table" method="post" enctype="multipart/form-data">
    <div class="space-y-12">
        
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="mt-7 text-2xl font-semibold leading-7 text-gray-900">Create Your Table</h2>
            <div class="sm:col-span-4">
                <label for="dbname" class="mt-7 block text-l font-medium leading-6 text-gray-900">Choose Your Database</label>
                <div class="mt-4">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <select name="dbname" id="dbname">
                            <option value="">select</option>
                            <?php foreach ($databaseList as $dbList =>$list): ?>
                            <option value="<?php echo$list->Database?>"><?php echo$list->Database?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="Table Name" class="block text-sm font-medium leading-6 text-gray-900">Table Name</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="Table Name" id="dbname" autocomplete="Table Name"
                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                   placeholder="Table Name">
                        </div>
                    </div>
                </div>
            </div>

            <table class="mt-5" id="table" >
                <tr>
                    <td>
                        <label class="m-10" for="column_name">Column Name</label>
                        <label class="m-24" for="data_type">Data Type</label>

                        <br>
                    </td>
                </tr>
                <tr >
                    <td>
                        <input class="m-2" name ="column_name[]" type="text"  placeholder="enter column name">
                        <select class="" name="data_type[]" id="data_type">
                            <option value="int">INT</option>
                            <option value="varchar(255)">Text</option>
                            <option value="timestamp">Date Time</option>
                        </select>
                        <button type="button" class="add" id="add">Add More</button>
                    </td>
                </tr>
            </table>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">Create Table</button>
</form>

<!-- adding script tag add more button -->
<script>
    let Table = document.querySelector('#table');

    let AddMoreBtn = document.querySelector('.add');

    let valuedataTypes = ['int','varchar(255)','timestamp'];
    let displayDataTypes = ['INT','Text','Date Time']

    AddMoreBtn.addEventListener("click",()=>{
        let table_tr = document.createElement('tr')
        let table_td = document.createElement('td');
        let Column_field = document.createElement('input');
        Column_field.type ="text"
        Column_field.classList ="m-2"

        Column_field.placeholder ="Enter Column Name"
        Column_field.name = "column_name[]";
        table_td.append(Column_field);

        let Select_field = document.createElement('select');
        Select_field.id = 'selectDatatype';
        Select_field.name = 'data_type[]';
        table_td.appendChild(Select_field)

        for(let i=0;i<valuedataTypes.length;i++){
            let Option_field = document.createElement('option');
            Option_field.value = valuedataTypes[i];
            Option_field.text = displayDataTypes[i];
            Select_field.appendChild(Option_field);
        }
        table_tr.appendChild(table_td);
        Table.appendChild(table_tr)
    })
</script>

</body>

</html>