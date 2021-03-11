$(document).ready(function() {
//     $('#editParagraph').editable('save.php');
// });
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
                let editIds = ["edit", "edit2", "edit3"];
                if (len > 0) {
                    for (let i = 0; i < len; i++) {
                        let current_state_id = response['current-states'][i].current_state_id;
                        //FIELDs
                        let name = response['current-states'][i].name;
                        let transferred_quantity = response['current-states'][i].transferred_quantity;
                        let purchase_quantity = response['current-states'][i].purchase_quantity;
                        let count_sale = response['current-states'][i].countSale;
                        let measure = response['current-states'][i].measure;
                        let totalSale = Number(count_sale) * Number(measure);

                        let total = Number(transferred_quantity) + Number(purchase_quantity);
                        let sold_quantity = Number(total) - Number(transferred_quantity);

                        let sold_price = response['current-states'][i].sold_price;
                        let totalDrinks = Number(sold_price) * Number(count_sale)
                        let totalSum = Number(total) -Number(totalSale);

                        let path = window.location.pathname;
                        let fontColor = ""
                        if(path == "/current-states/change") {
                            fontColor += "text-red-700";
                        }

                            let output =
                                "<tr>" +
                                    "<td class='px-3 py-3 text-xl font-bold'>"+i+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+name+"</td>"+
                                    "<td id=\"editTransferred"+current_state_id+"\" class='px-3 py-3 text-xl font-bold "+fontColor+"'>"+transferred_quantity+"</td>"+
                                    "<td id=\"editPurchase"+current_state_id+"\" class='px-3 py-3 text-xl font-bold "+fontColor+"' >"+purchase_quantity+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+total.toFixed(2)+"</td>"+
                                    "<td id=\"editTotalSale"+current_state_id+"\" class='px-3 py-3 text-xl font-bold'>"+totalSale.toFixed(2)+"</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+sold_price+" RSD</td>"+
                                    "<td class='px-3 py-3 text-xl font-bold'>"+totalDrinks.toFixed(2)+" RSD</td>"+
                                    "<td class='px-5 py-5 text-xl font-bold'>"+totalSum.toFixed(2)+"</td>"+
                                "</tr>";

                        $("#fetchQuantityTable").append(output);


                        console.log(path);

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

                            // $("#editTotalSale" + current_state_id).editable(function (data) {
                            //     $.ajax({
                            //         url: '../updateTotalSale' + current_state_id,
                            //         headers: CSRF_TOKEN,
                            //         type: 'POST',
                            //         data: {_token: CSRF_TOKEN, data: data},
                            //         dataType: 'JSON',
                            //         success: function () {
                            //             fetchSolds()
                            //         }
                            //     }, {
                            //         cancel: 'Cancel',
                            //         submit: 'Save',
                            //         tooltip: "Click to edit...",
                            //     });
                            // });
                        }

                    }
                } else {
                    let output = "<p id='editId'>Nema nista</p>";

                }
            }
        });
    }

});
