$(document).ready(function() {
    let CSRF_TOKEN =  $('meta[name="csrf-token"]').attr('content')

    fetchSolds()

    function fetchSolds() {
        $.ajax({
            url: '../getCurrentStates',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                $("#fetchQuantityTable").empty()
                let len = 0;
                if (response != null) {
                    len = response['current-states'].length;
                }
                let sum = 0;
                let sum2= 0;

                if (len > 0) {
                    for (let i = 0; i < len; i++) {
                        let current_state_id = response['current-states'][i].current_state_id;
                        //FIELDs
                        let drink_name = response['current-states'][i].drink_name;
                        let transferred_quantity = response['current-states'][i].transferred_quantity;
                        let purchase_quantity = response['current-states'][i].purchase_quantity;
                        let count_sale = response['current-states'][i].countSale;
                        let measure = response['current-states'][i].measure;
                        let sold_price = response['current-states'][i].sold_price;
                        let measure_per_bottle = response['current-states'][i].measure_per_bottle;


                        let totalSale = Number(count_sale) * Number(measure);

                        let total = Number(transferred_quantity) + Number(purchase_quantity);
                        let sold_quantity = Number(total) - Number(transferred_quantity);

                        let purchase_price = response['current-states'][i].purchase_price;
                        let totalDrinks = Number(sold_price) * Number(count_sale)
                        let totalSum = Number(total) -Number(totalSale);

                        let path = window.location.pathname;
                        let fontColor = ""
                        //SUM
                        sum += parseInt(response['current-states'][i].purchase_price);
                        sum2 += parseInt(totalDrinks);
                        //END SUM

                        if(path == "/current-states/change") {
                            fontColor += "text-red-700";
                        }
                            let output =
                                "<tr>" +
                                    "<td class='px-3 py-3 text-xl font-bold'>"+i+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+drink_name+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+measure_per_bottle+"</td>"+
                                    "<td id=\"editTransferred"+current_state_id+"\" class='px-3 py-3 text-xl font-bold "+fontColor+"'>"+transferred_quantity+"</td>"+
                                    "<td id=\"editPurchase"+current_state_id+"\" class='px-3 py-3 text-xl font-bold "+fontColor+"' >"+purchase_quantity+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+total.toFixed(2)+"</td>"+
                                    "<td id=\"editTotalSale"+current_state_id+"\" class='px-3 py-3 text-xl font-bold'>"+totalSale.toFixed(2)+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+purchase_price+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+totalDrinks.toFixed(2)+"</td>"+
                                    "<td class='px-5 py-5 text-xl font-bold'>"+totalSum.toFixed(2)+"</td>"+
                                "</tr>";
                        $("#fetchQuantityTable").append(output);

                        if(path == "/current-states/change") {
                            $("#editPurchase" + current_state_id).editable(function (data) {
                                $.ajax({
                                    url: '../updatePurchasingDrink' + current_state_id,
                                    headers: CSRF_TOKEN,
                                    type: 'POST',
                                    data: {_token: CSRF_TOKEN, data: data},
                                    dataType: 'JSON',
                                    success: function () {
                                        fetchSolds()
                                    }
                                }, {
                                    cancel: 'Cancel',
                                    submit: 'Save',
                                    tooltip: "Click to edit...",
                                });
                            });

                            $("#editTransferred" + current_state_id).editable(function (data) {
                                $.ajax({
                                    url: '../updateTransferredQuantity' + current_state_id,
                                    headers: CSRF_TOKEN,
                                    type: 'POST',
                                    data: {_token: CSRF_TOKEN, data: data},
                                    dataType: 'JSON',
                                    success: function () {
                                        fetchSolds()
                                    }
                                }, {
                                    cancel: 'Cancel',
                                    submit: 'Save',
                                    tooltip: "Click to edit...",
                                });
                            });
                        }
                    }
                //    HERE
                    let output2 =
                            "<tr>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td class='text-left text-2xl'>UKUPNO:</td>"+
                            "</tr>"+
                            "<tr>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td class='text-left text-xl font-bold'>"+Intl.NumberFormat('rs-RS', { style: 'currency', currency: 'RSD' }).format(sum2)+"</td>"+
                        "</tr>";
                    $("#fetchQuantityTable").append(output2);
                } else {
                    let output = "<p id='editId'>Nema nista</p>";
                }
            }
        });
    }
});
