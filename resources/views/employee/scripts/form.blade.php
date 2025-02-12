<script>
    $(document).ready(function() {
        let provinceID = @json($employee ?? [] ? $employee->province : []);
        let cityID = @json($employee ?? [] ? $employee->city : []);
        let districtID = @json($employee ?? [] ? $employee->district : []);
        let urbanVillageID = @json($employee ?? [] ? $employee->urban_village : []);
        console.log(provinceID, cityID, districtID, urbanVillageID);

        const setInputValue = (provinceID, cityID, districtID, urbanVillageID) => {
            // let number = str.split("-")[0];
            getCities(provinceID.split("-")[0], cityID)
            getDistricts(cityID.split("-")[0], districtID)
            getVillages(districtID.split("-")[0], urbanVillageID)
        }


        function getProvince(selectedProvinceId = null) {
            console.log(selectedProvinceId);

            $.ajax({
                type: "GET",
                url: "{{ route('api.provinces') }}",
                dataType: "json",
                success: function(response) {
                    let provinces = `<option selected disabled>Provinsi</option>`;

                    response.forEach(item => {
                        let selected = (item.id + '-' + item.name == selectedProvinceId) ?
                            'selected' : ''
                        provinces +=
                            `<option value="${item.id}-${item.name}" data-id="${item.id}" ${selected} class="selected-province">${item.name}</option>`;
                    });

                    $('#province-select').html(provinces);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function getCities(provinceID, cityID = null) {
            const apiProvinceCities = "{{ route('api.province.cities', ['provinceID' => ':provinceID']) }}"
            const url = apiProvinceCities.replace(':provinceID', provinceID)
            
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    console.log(provinceID);
                    if (!cityID) {
                        $('.city-input').toggle('hidden');
                    }
                    let cities = `<option selected disabled>Kabupaten / kota</option>`;
                    response.forEach(item => {
                        let selected = (item.id + '-' + item.name == cityID) ? 'selected' :
                            ''
                        cities +=
                            `<option value="${item.id}-${item.name}" data-id="${item.id}" ${selected} class="selected-city">${item.name}</option>`;
                    });
                    $('#city-select').html(cities);
                }
            });
        }

        function getDistricts(regencyID, districtID = null) {
            const apiProvinceCities =
                "{{ route('api.province.city.districts', ['regencyID' => ':regencyID']) }}"
            const url = apiProvinceCities.replace(':regencyID', regencyID)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (!districtID) {
                        $('.district-input').toggle('hidden');
                    }
                    let districts = `<option selected disabled>Kecamatan</option>`;
                    response.forEach(item => {
                        let selected = (item.id + '-' + item.name == districtID) ?
                            'selected' : ''
                        districts +=
                            `<option value="${item.id}-${item.name}" data-id="${item.id}" ${selected} class="selected-city">${item.name}</option>`;
                    });
                    $('#district-select').html(districts);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function getVillages(districtID, urbanVillageID = null) {
            const apiProvinceCities =
                "{{ route('api.province.city.district.villages', ['districtID' => ':districtID']) }}"
            const url = apiProvinceCities.replace(':districtID', districtID)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (!urbanVillageID) {
                        $('.urban-village-input').toggle('hidden');
                    }
                    let villages = `<option selected disabled>Desa</option>`;
                    response.forEach(item => {
                        let selected = (item.id + '-' + item.name == urbanVillageID) ?
                            'selected' : ''
                        villages +=
                            `<option value="${item.id}-${item.name}" data-id="${item.id}" ${selected} class="selected-city">${item.name}</option>`;
                    });
                    $('#urban-village-select').html(villages);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function storeemployee() {
            const employeeData = $('#employee-form').serialize();
            console.log(employeeData);

        }

        $('#province-select').on('change', function() {
            let selectedOption = $(this).find(':selected')
            let province_id = selectedOption.attr('data-id')
            provinceID = selectedOption.attr('data-id')
            getCities(province_id)
        });

        $('#city-select').on('change', function() {
            let selectedOption = $(this).find(':selected')
            let regency_id = selectedOption.attr('data-id')
            regencyID = selectedOption.attr('data-id')
            getDistricts(regency_id)
        });

        $('#district-select').on('change', function() {
            let selectedOption = $(this).find(':selected')
            let district_id = selectedOption.attr('data-id')
            districtID = selectedOption.attr('data-id')
            getVillages(district_id)
        });

        $('#store-employee').on('click', function() {
            console.log('store');
            storeemployee()
        });

        getProvince(provinceID)

        if (provinceID.length > 0) {
            setInputValue(provinceID, cityID, districtID, urbanVillageID)
        }
    });
</script>
