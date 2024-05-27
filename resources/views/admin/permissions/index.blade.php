@extends('layouts.admin')

@section('content')
    <div class="p-4 sm:ml-64  h-[100vh] bg-gray-100">
        <div class="p-4  mt-14 ">
            <div
                class=" xl:ms-8 lg:ms-8 md:ms-6 bg-white xl:rounded-3xl lg:rounded-3xl md:rounded-2xl p-8 relative overflow-x-auto shadow-lg sm:rounded-lg">
                <div class="flex justify-end w-full ms-2">
                    <button id="openModalButton"
                        class=" text-white mt-2 bg-cyan-800 hover:bg-cyan-900 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add
                        Permission</button>
                    {{-- <form class="max-w-md ">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="company-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search companies" required />
                    </div>
                </form> --}}
                </div>

                <table id="permissions" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-16 py-3">
                                Name
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody id="permissionTable">
                        @foreach ($permissions as $key => $permission)
                            {{-- @dd($company['image']); --}}
                            <tr id="permission-{{ $permission->id }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $permission->name }}
                                </td>


                                <td class="px-6 py-4">
                                    <button onclick="editPermission('{{ json_encode($permission) }}')" id="openModalButton"
                                        class="font-medium me-3 text-blue-600 dark:text-blue-500 hover:underline"><iconify-icon
                                            icon="mage:edit" width="1.5em" height="1.5em"></iconify-icon></button>
                                    <button data-id="{{ $permission->id }}" onclick="deletePermission({{ $permission->id }})"
                                        id="delete-company"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline"><iconify-icon
                                            icon="octicon:trash-24" width="1.5em" height="1.5em"
                                            style="color: #ff0000"></iconify-icon></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div id="crudModal"
            class="fixed overflow-y-auto mt-12 pl-[18px] pr-[7px] top-[35px] right-0 bottom-0 xl:w-1/2 lg:w-1/2 md:w-1/2 w-full  flex justify-end items-center "
            style="right: -100%;">
            <div class="bg-gray-200 w-full xl:h-full lg:h-full md:h-full h-auto p-8 rounded-3xl">
                <div class="flex justify-between pr-5 pl-5">
                    <h2 class="text-xl font-semibold" id="title"></h2>
                    <button id="closecrudModalButton" onclick="closeModalButton()"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none float-right">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-5">

                    <div class=" dark:border-gray-700 mt-20">
                        <form id="permissionForm">
                            @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <input type="hidden" id="permission_id" name="permission_id" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Permission Name" />

                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Name</label>
                                    <input type="text" id="name" name="name" value=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Permission Name" />
                                    <span class="text-red-500 text-xs mt-1 validation-error" id="name-error"></span>
                                </div>

                            </div>

                            <div class="w-full">
                                <button type="submit"
                                    class="text-white bg-cyan-800 hover:bg-cyan-900 xl:w-full lg:w-full md:full w-full  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openModalButton() {
            $('#crudModal').css({
                right: '-100%'
            }).show().animate({
                right: '0'
            }, 'slow');
            const crudModal = document.getElementById("crudModal");
            crudModal.style.display = "block";
        }

        function closeModalButton() {

            const crudModal = document.getElementById("crudModal");
            const form = crudModal.querySelector("form");
            form.reset();
            crudModal.style.display = "none";
            $(".validation-error").text("");
            document.getElementById('title').textContent = "Add Permission";
        }

        function editPermission(data) {

            openModalButton();
            document.getElementById('title').textContent = "Edit Permission";
            // document.getElementById('image_div').style.display = 'block';
            var permission = JSON.parse(data);
            document.getElementById('permission_id').value = permission.id;
            document.getElementById('name').value = permission.name;
            // document.getElementById('owner_name').value = company.owner_name;
            // document.getElementById('registration_number').value = company.registration_number;
            // document.getElementById('date_founded').value = company.date_founded;
            // document.getElementById('business_category').value = company.business_category;
            // var imageElement = document.getElementById('image');
            // imageElement.src = "storage/" + company.image;
        }

        $(document).ready(function() {

            var table = $('#permissions').DataTable();


            $('#crudModal').hide();

            // $('#company-search').on('keyup', function() {
            //     var search = $(this).val();
            //     $.ajax({
            //         url: '/companies/search',
            //         type: 'POST',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         data: {
            //             search: search
            //         },
            //         success: function(data) {

            //             var resultsTableBody = $('#companies tbody');
            //             resultsTableBody.empty(); // Clear any existing rows

            //             data.data.forEach(function(company) {
            //                 var row = $('<tr>').addClass(
            //                     'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'
            //                     );

            //                 var logoCell = $('<td>').addClass('p-4');
            //                 var logoImg = $('<img>').attr('src', '/storage/' + company
            //                     .image).addClass(
            //                     'w-16 md:w-32 max-w-full max-h-full').attr('alt',
            //                     'Logo');
            //                 logoCell.append(logoImg);

            //                 var nameCell = $('<td>').addClass(
            //                     'px-6 py-4 font-semibold text-gray-900 dark:text-white'
            //                     ).text(company.name);
            //                 var ownerCell = $('<td>').addClass(
            //                     'px-6 py-4 font-semibold text-gray-900 dark:text-white'
            //                     ).text(company.owner_name);
            //                 var registrationNumberCell = $('<td>').addClass(
            //                     'px-6 py-4 font-semibold text-gray-900 dark:text-white'
            //                     ).text(company.registration_number);
            //                 var dateFoundedCell = $('<td>').addClass(
            //                     'px-6 py-4 font-semibold text-gray-900 dark:text-white'
            //                     ).text(company.date_founded);
            //                 var categoryCell = $('<td>').addClass(
            //                     'px-6 py-4 font-semibold text-gray-900 dark:text-white'
            //                     ).text(company.business_category);

            //                 var actionsCell = $('<td>').addClass('px-6 py-4');
            //                 var editButton = $('<button>')
            //                     .attr('onclick',
            //                         `editCompany('${JSON.stringify(company)}')`)
            //                     .addClass(
            //                         'font-medium me-3 text-blue-600 dark:text-blue-500 hover:underline'
            //                         )
            //                     .html(
            //                         '<iconify-icon icon="mage:edit" width="1.5em" height="1.5em"></iconify-icon>'
            //                         );
            //                 var deleteButton = $('<button>')
            //                     .attr('data-id', company.id)
            //                     .attr('onclick', `deleteCompany(${company.id})`)
            //                     .addClass(
            //                         'font-medium text-red-600 dark:text-red-500 hover:underline'
            //                         )
            //                     .html(
            //                         '<iconify-icon icon="octicon:trash-24" width="1.5em" height="1.5em" style="color: #ff0000"></iconify-icon>'
            //                         );

            //                 actionsCell.append(editButton).append(deleteButton);

            //                 row.append(logoCell)
            //                     .append(nameCell)
            //                     .append(ownerCell)
            //                     .append(registrationNumberCell)
            //                     .append(dateFoundedCell)
            //                     .append(categoryCell)
            //                     .append(actionsCell);

            //                 resultsTableBody.append(row);
            //             });
            //         }
            //     })
            // });

            $("#openModalButton").click(function() {
                $('#crudModal').fadeIn(500);
                $('#crudModal').css({
                    right: '-100%'
                }).show().animate({
                    right: '0'
                }, 'slow');
                $('#title').text("Add Permission");
                $('#crudModal').show();
            });



            function updateRowIndex() {
                $('#permissionTable tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            $('#permissionForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this);
                var permissionId = formData.get('permission_id');



                var ajaxUrl = permissionId ? `/admin/permissions/${permissionId}` : '/admin/permissions';
                var ajaxType = permissionId ? 'POST' : 'POST';
                if (permissionId) {
                    formData.append('_method', 'PUT');
                }

               // use permission resource url
                $.ajax({
                    url: ajaxUrl,
                    type: ajaxType,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting the content-type
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token in the headers
                    },
                    success: function(response) {
                        // Clear form fields
                        $('#permisson_id').val("");
                        $('#permissionForm')[0].reset();
                        closeModalButton();
                        if (response.status == true) {
                            Alert(response.message, "success");

                            var newPermission = response.data;

                            var newRow = `
                                <tr id="permission-${newPermission.id}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white"></td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${newPermission.name}</td>
                                    <td class="px-6 py-4">
                                        <button onclick="editPermission('${JSON.stringify(newPermission)}')" id="openModalButton" class="font-medium me-3 text-blue-600 dark:text-blue-500 hover:underline">
                                            <iconify-icon icon="mage:edit" width="1.5em" height="1.5em"></iconify-icon>
                                        </button>
                                        <button data-id="${newPermission.id}" onclick="deletePermission(${newPermission.id})" id="delete-company" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            <iconify-icon icon="octicon:trash-24" width="1.5em" height="1.5em" style="color: #ff0000"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                            `;

                            if (permissionId) {
                                console.log(permissionId);
                                console.log(newRow);
                                // Update the existing row
                                $(`#permission-${newPermission.id}`).replaceWith(newRow);
                                updateRowIndex();


                            } else {
                                // Append the new row
                                console.log(newRow);
                                $('#permissionTable').append(newRow);
                                updateRowIndex();
                                setInterval(() => {
                                    location.reload();
                                }, 2000);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log('Error:', error);
                        var response = JSON.parse(xhr.responseText);
                            if (response.errors) {

                                $.each(response.errors, function(key, value) {
                                    console.log(key);
                                    $("#" + key + "-error").text(value);
                                });
                            } else {
                                Alert("Something went wrong!", "error");
                            }
                    }
                });
            });



            function Alert(message, status) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: status,
                    title: message
                });
            }
        });

        function updateRowIndex() {
                $('#permissionTable tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

        function deletePermission(id) {
            var permissionId = id;
            console.log(permissionId);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/permissions/${permissionId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            if (response.status == true) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: "Permission deleted successfully"
                                });
                            }

                            $(`#permission-${permissionId}`).remove();
                            updateRowIndex();
                            console.log('Permission deleted successfully');

                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });

                }
            });
        }
    </script>
@endsection
