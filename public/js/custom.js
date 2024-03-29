$(document).ready(function () {
    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return this.optional(element) || /^[A-Za-z\s]+$/.test(value);
        },
        "Only letters and spaces are allowed."
    );
    $.validator.addMethod(
        "noSpecialCharsWithNumbers",
        function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9\s]+$/.test(value);
        },
        "Only Numbers, letters and spaces are allowed."
    );
    $.validator.setDefaults({
        highlight: function (element) {
            // Prevent default input highlighting
            $(element).removeClass("error");
        },
        unhighlight: function (element) {
            // Reset any changes made during highlighting
            $(element).removeClass("error");
        },
    });

    $("#userRegistrationForm").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                noSpecialChars: true,
            },
            last_name: {
                required: true,
                noSpecialChars: true,
            },
            email: {
                required: true,
                email: true,
            },
            // Add rules for other fields
        },
        messages: {
            first_name: {
                required: "Please enter your first name",
                minlength: "Name must be at least 3 characters long",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            last_name: {
                required: "Please enter your last name",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please enter your password",
            },
            // Add messages for other fields
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "first_name":
                    error.appendTo("#name-error");
                    break;
                case "last_name":
                    error.appendTo("#last_name-error");
                    break;
                case "email":
                    error.appendTo("#email-error");
                    break;
                case "password":
                    error.appendTo("#password-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    // Admin Panel Category Form
    $("#categoryForm").validate({
        rules: {
            title: {
                required: true,
                maxlength: 100,
                noSpecialChars: true,
            },
            description: {
                required: true,
                maxlength: 300,
                noSpecialChars: true,
            },
        },
        messages: {
            title: {
                required: "Title can't be null.",
                maxlength: "Description can't exceed more than 100 characters",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            description: {
                required: "Please add description.",
                maxlength: "Description can't exceed more than 300 characters",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "title":
                    error.appendTo("#title-error");
                    break;
                case "description":
                    error.appendTo("#description-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });
    //Admin panel Solar panels Form
    $("#panelForm").validate({
        rules: {
            watts: {
                required: true,
                maxlength: 5,
                numeric: true,
                min: 100,
            },
            price: {
                required: true,
                numeric: true,
                min: 1,
            },
            description: {
                required: true,
                maxlength: 300,
                noSpecialCharsWithNumbers: true,
            },
            title: {
                required: true,
                maxlength: 30,
                noSpecialCharsWithNumbers: true,
            },
        },
        messages: {
            watts: {
                required: "Panel type can't be null.",
                maxlength: "Panel can't exceed more than 10,000kwh",
                numeric: "Only numbers are allowed",
                min: "Minimum 100Kwh panel can be added.",
            },
            price: {
                required: "Panel price can't be null.",
                numeric: "Only numbers are allowed",
                min: "Price can't be added 0 or in negative value.",
            },
            description: {
                required: "Please add description.",
                maxlength: "Description can't exceed more than 300 characters",
                noSpecialChars: "Only Numbers,letters and spaces are allowed.",
            },
            title: {
                required: "Please add title.",
                maxlength: "Title can't exceed more than 30 characters",
                noSpecialChars: "Only Numbers,letters and spaces are allowed.",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "title":
                    error.appendTo("#title-error");
                    break;
                case "price":
                    error.appendTo("#price-error");
                    break;
                case "description":
                    error.appendTo("#description-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    // Admin Panel Tag Form
    $("#tagForm").validate({
        rules: {
            title: {
                required: true,
                maxlength: 100,
                noSpecialChars: true,
            },
            description: {
                required: true,
                maxlength: 300,
                noSpecialChars: true,
            },
        },
        messages: {
            title: {
                required: "Title can't be null.",
                maxlength: "Description can't exceed more than 100 characters",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            description: {
                required: "Please add description.",
                maxlength: "Description can't exceed more than 300 characters",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "title":
                    error.appendTo("#title-error");
                    break;
                case "description":
                    error.appendTo("#description-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });
    //Company profile settings form
    $("#settingsForm").validate({
        rules: {
            company_name: {
                required: true,
                maxlength: 100,
                noSpecialChars: true,
            },
            company_email: {
                required: true,
                email: true,
            },
            company_phone_number: {
                required: true,
                numeric: true,
            },
        },
        messages: {
            company_name: {
                required: "Title can't be null.",
                maxlength: "Company Name can't exceed more than 100 characters",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            company_email: {
                required: "Please add email.",
                email: "Please add valid email address",
            },
            company_phone_number: {
                required: "Please add company phone number.",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "company_name":
                    error.appendTo("#company_name-error");
                    break;
                case "company_email":
                    error.appendTo("#company_email-error");
                    break;
                case "company_phone_number":
                    error.appendTo("#company_phone_number-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });
    // Add new variation form
    $("#newProductVariationForm").validate({
        rules: {
            title: {
                required: true,
                noSpecialChars: true,
            },
            price: {
                required: true,
                min: 1,
            },
            stock: {
                required: true,
                min: 1,
            },
            warranty: {
                required: true,
                min: 1,
            },
        },
        messages: {
            title: {
                required: "Please add title of the product",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            price: {
                required: "Please add price of the product",
                min: "Can't add price 0 or in negative",
            },
            stock: {
                required: "Please add stock of the product",
                min: "Can't add stock 0 or in negative",
            },
            warranty: {
                required: "Please add warranty of the product",
                min: "Can't add warranty 0 or in negative",
            },
            Kwh: {
                required: "Please add Kwh of the product",
                min: "Can't add warranty 0 or in negative",
            },
            specification_name: {
                required: "Please add specifcation of the product",
            },
        },
        errorPlacement: function (error, element) {
            switch (element.attr("id")) {
                case "variationTitle":
                    error.appendTo("#variationTitle-error");
                    break;
                case "variationPrice":
                    error.appendTo("#variationPrice-error");
                    break;
                case "variationStock":
                    error.appendTo("#variationStock-error");
                    break;
                case "variationWarranty":
                    error.appendTo("#variationWarranty-error");
                    break;
                case "variationKwh":
                    error.appendTo("#variationKwh-error");
                    break;
                case "variationKwh":
                    error.appendTo("#variationKwh-error");
                    break;
                case "variationSpecification_name":
                    error.appendTo("#variationSpecification_name-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });
    // edit product variation form
    $("#editProductVariationForm").validate({
        rules: {
            title: {
                required: true,
                noSpecialChars: true,
            },
            price: {
                required: true,
                min: 1,
            },
            stock: {
                required: true,
                min: 1,
            },
            warranty: {
                required: true,
                min: 1,
            },
        },
        messages: {
            title: {
                required: "Please add title of the product",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            price: {
                required: "Please add price of the product",
                min: "Can't add price 0 or in negative",
            },
            stock: {
                required: "Please add stock of the product",
                min: "Can't add stock 0 or in negative",
            },
            warranty: {
                required: "Please add warranty of the product",
                min: "Can't add warranty 0 or in negative",
            },
        },
        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "title":
                    error.appendTo("#edit_title-error");
                    break;
                case "price":
                    error.appendTo("#edit_price-error");
                    break;
                case "stock":
                    error.appendTo("#edit_stock-error");
                    break;
                case "warranty":
                    error.appendTo("#edit_warranty-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    $("#newProductForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            specification_name: {
                required: true,
            },
            price: {
                required: true,
                min: 1,
            },
            category: {
                required: true,
            },
            stock: {
                required: true,
                min: 1,
            },
            warranty: {
                required: true,
                min: 1,
            },
            Kwh: {
                required: true,
                min: 1,
            },
        },
        messages: {
            title: {
                required: "Please add title of the product",
            },
            description: {
                required: "Please add description of the product",
            },
            specifications: {
                required: "Please add specifications of the product",
            },
            category: {
                required: "Please select category of the product",
            },
            stock: {
                required: "Please add stock of the product",
            },
            warranty: {
                required: "Please add warranty of the product",
            },
            Kwh: {
                required: "Please add Kwh of the product",
            },
        },
        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "title":
                    error.appendTo("#itle-error");
                    break;
                case "description":
                    error.appendTo("#title-error");
                    break;
                case "price":
                    error.appendTo("#price-error");
                    break;
                case "stock":
                    error.appendTo("#stock-error");
                    break;
                case "warranty":
                    error.appendTo("#warranty-error");
                    break;
                case "Kwh":
                    error.appendTo("#Kwh-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    $("#memberRegistrationForm").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                noSpecialChars: true,
            },
            last_name: {
                required: true,
                noSpecialChars: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone_number: {
                required: true,
                maxlength: 15,
                numeric: true,
            },
            description: {
                required: true,
            },
            designation: {
                required: true,
            },
            // Add rules for other fields
        },
        messages: {
            first_name: {
                required: "Please enter your first name",
                minlength: "Name must be at least 3 characters long",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            last_name: {
                required: "Please enter your last name",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            phone: {
                required: "Please enter your phone number",
                numeric: "Please add valid numbers only",
            },
            description: {
                required: "Please enter your description",
                maxlength: 100,
            },
            designation: {
                required: "Please enter your description",
            },
            // Add messages for other fields
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "first_name":
                    error.appendTo("#name-error");
                    break;
                case "last_name":
                    error.appendTo("#last_name-error");
                    break;
                case "email":
                    error.appendTo("#email-error");
                    break;
                case "phone":
                    error.appendTo("#phone-error");
                    break;
                case "description":
                    error.appendTo("#description-error");
                    break;
                case "designation":
                    error.appendTo("#designation-error");
                    break;
                default:
                    // Handle other fields if needed
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    // Customer Validation
    $("#customerAccountForm").validate({
        rules: {
            first_name: {
                required: true,
                noSpecialChars: true,
                minlength: 3,
            },
            last_name: {
                required: true,
                noSpecialChars: true,
                minlength: 3,
            },
            phone: {
                required: true,
                numeric: true,
                maxlength: 15,
            },
        },
        messages: {
            first_name: {
                required: "First name can't be null",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            last_name: {
                required: "First name can't be null",
                noSpecialChars: "Only letters and spaces are allowed.",
            },
            phone: {
                required: "Phone number field can't be null.",
                maxlength: "Number can't exceed more than 15 characters.",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "first_name":
                    error.appendTo("#first_name-error");
                    break;
                case "last_name":
                    error.appendTo("#last_name-error");
                    break;
                case "phone":
                    error.appendTo("#phone_name-error");
                    break;

                default:
                    error.insertAfter(element); // Default placement
                    break;
            }
        },
    });

    //New Address Form

    $("#newAddressForm").validate({
        rules: {
            shippingFullName: {
                required: true,
                noSpecialChars: true,
            },
            phone_number: {
                required: true,
                numeric: true,
                maxlength: 15,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            country: {
                required: true,
            },
            shippingAddress2: {
                required: true,
            },
            zip: {
                required: true,
            },
        },
        messages: {
            shippingFullName: {
                required: "Billing name field can't be null.",
            },
            phone_number: {
                required: "Please add phone number.",
            },
            city: {
                required: "Please select atleast one city",
            },
            state: {
                required: "Please select atleast one state",
            },
            country: {
                required: "Please select atleast one country",
            },
            shippingAddress2: {
                required: "Billing address field can't be empty",
            },
            zip: {
                required: "Postal code field can't be empty",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "shippingFullName":
                    error.appendTo("#shippingFullName-error");
                    break;
                case "phone_number":
                    error.appendTo("#phone_number-error");
                    break;
                case "city":
                    error.appendTo("#city-error");
                    break;
                case "country":
                    error.appendTo("#country-error");
                    break;
                case "shippingAddress2":
                    error.appendTo("#shippingAddress2-error");
                    break;
                case "zip":
                    error.appendTo("#zip-error");
                    break;
                default:
                    error.insertAfter(element);
                    break;
            }
        },
    });

    //Checkout Form - Payment
    $("#paymentForm").validate({
        rules: {
            shippingFullName: {
                required: true,
                noSpecialChars: true,
            },
            phone_number: {
                required: true,
                numeric: true,
                maxlength: 15,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            country: {
                required: true,
            },
            shippingAddress2: {
                required: true,
            },
            zip: {
                required: true,
            },
        },
        messages: {
            shippingFullName: {
                required: "Billing name field can't be null.",
            },
            phone_number: {
                required: "Please add phone number.",
            },
            city: {
                required: "Please select atleast one city",
            },
            state: {
                required: "Please select atleast one state",
            },
            country: {
                required: "Please select atleast one country",
            },
            shippingAddress2: {
                required: "Billing address field can't be empty",
            },
            zip: {
                required: "Postal code field can't be empty",
            },
        },

        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "shippingFullName":
                    error.appendTo("#shippingFullName-error");
                    break;
                case "phone_number":
                    error.appendTo("#phone_number-error");
                    break;
                case "city":
                    error.appendTo("#city-error");
                    break;
                case "country":
                    error.appendTo("#country-error");
                    break;
                case "shippingAddress2":
                    error.appendTo("#shippingAddress2-error");
                    break;
                case "zip":
                    error.appendTo("#zip-error");
                    break;
                default:
                    error.insertAfter(element);
                    break;
            }
        },
    });

    $("#basePriceForm").validate({
        rules: {
            price: {
                required: true,
                min: 1,
            },
        },
        messages: {
            price: {
                required: "Price field can't be null",
                min: "Price can't be 0 or in negative",
            },
        },
        errorPlacement: function (error, element) {
            switch (element.attr("name")) {
                case "price":
                    error.appendTo("#price-error");
                    break;
                default:
                    error.insertAfter(element);
                    break;
            }
        },
    });
});
