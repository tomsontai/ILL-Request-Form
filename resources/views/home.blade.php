<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- where does the CSS point to?? -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >


</head>

<body>

    <div class="container">
        <div class="row">
            <h1>ILL Statistics Form</h1>
        </div>
        @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
            </div>
            <div class="col-6">
                <form action="formSubmitted" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="dateLabel"><h3>Date:</h3></label><br>
                        <input id="datePicker" type="date" name="dateName" require><br>
                    </div>  

                    </p>
                    <!-- separate form groups -->
                    <!-- form check is similar to form group -->

                    <h3>Resource Type:</h3>
                    <div class="form-check">
                        <input type="radio" name="resourceTypeName" id="resourceType1" value="Electronic Article">
                            <label class="form-check-label" for="resourceType1">Electronic Article</label> </br>
                        <input type="radio" name="resourceTypeName" id="resourceType2" value="Book">
                            <label class="form-check-label" for="resourceType2">Book</label> </br>
                        <input type="radio" name="resourceTypeName" id="resourceType3">
                        <label class="form-check-label" for="resourceType3" id="resourceTypeOtherLabelId">Other</label> 
                        <input type="text" id="resourceTypeOtherId" name="resourceTypeName">
                    </div>

                        
                    <label for="actionLabel"><h3>Action:</h3></label>
                        
                    <!-- use form group and form control classes in bootstrap **** -->

                    <div class="form-check">
                        <input type="radio" name="actionType" id="actionType1" value="Borrow">
                            <label class="form-check-label" for="actionType1">Borrow</label> </br>
                        <input type="radio" name="actionType" id="actionType2" value="Lend">
                            <label class="form-check-label" for="actionType2">Lend</label></br>
                        <input type="radio" name="actionType" id="actionType3" value="Renew Borrowed Item">
                            <label class="form-check-label" for="actionType3">Renew Borrowed Item</label></br>
                        <input type="radio" name="actionType" id="actionType4" value="Renew Lent Item">
                            <label class="form-check-label" for="actionType4">Renew Lent Item</label>         </br>       

                    </div>
                    </p>

                    <!--TO DO-->
                        <label for="filledLabel"><h3>Filled or Unfilled:</h3></label> </br>
                        <div class="form-check">
                            <input type="radio" name="fillTypeName" id="filled" value="0">
                                <label class="form-check-label" for="filled">Filled</label> </br>
                            <input type="radio" name="fillTypeName" id="unfilled" value="1">
                                <label class="form-check-label" for="unfilled">Unfilled</label></br>
                        </div>
                    </p>
                    
                    <!--TO DO-->
                    <div class="form-check" id="unfilledFormId" disabled>
                        <label for="unfilledLabel"><h3>If Unfilled, Reason:</h3></label> </br>
                        
                        <input type="radio" name="unfilledTypeName" id="unfilled1" value="Unavailable">
                            <label class="form-check-label" for="unfilled1">Unavailable</label> </br>
                        <input type="radio" name="unfilledTypeName" id="unfilled2" value="Google Scholar">
                            <label class="form-check-label" for="unfilled2">Google Scholar</label></br>
                        <input type="radio" name="unfilledTypeName" id="unfilled3" value="Other Language">
                            <label class="form-check-label" for="unfilled3">Other Language</label> </br>
                        <input type="radio" name="unfilledTypeName" id="unfilled4" value="Not needed after date">
                            <label class="form-check-label" for="unfilled4">Not needed after date</label></br>
                        <input type="radio" name="unfilledTypeName" id="unfilled5">
                            <label class="form-check-label" for="unfilled5">Other</label>
                        <input type="text" name="unfilledTypeName" id="unfilledOther"></br>
                    </div>
                    
                    <!--change "for"-->
                    <label for="whatLabel"><h3>Institution or Library Name or Ship-to-Me:</h3></label>
                    <input class="form-control" type="text" id="libraryNameId" name="libraryName" placeholder="enter library name. (e.g. BCIT, Port Moody Public)"><br>

                    <input type="submit" value="Submit">

                    </div>
                </form> 
            <div class="col"></div>
            </div>
        </div>
    </div>

    <!-- added new date --> 
    <script>
        document.getElementById("datePicker").valueAsDate = new Date();
        //const unfilledId = document.getElementById("unfilledFormId");
        var inputFilled = document.getElementById("filled");
        var inputUnfilled = document.getElementById("unfilled");
        
        // get rid of Unfilled block when loaded in. 
        if (!inputUnfilled.selected) {
            // if not selected, disable the form
            document.getElementById('unfilledFormId').style.display = "none";
        } 

        inputUnfilled.addEventListener('change', function() {
            var style = this.value == 1 ? 'block' : 'none';
            document.getElementById('unfilledFormId').style.display = style;
        });
        inputFilled.addEventListener('change', function() {
            var style = this.value == 1 ? 'block' : 'none';
            document.getElementById('unfilledFormId').style.display = style;
        });

        //////////////////////////////////////////////////////
        // if this is selected. BRUTE FORCED. FIX IN FUTURE.
        var resType3 = document.getElementById('resourceType3');
        var resTypeIdTextBox = document.getElementById('resourceTypeOtherId');

        //disable the textbox when the app fires up. 
        resTypeIdTextBox.setAttribute("disabled","disabled");
        resType3.addEventListener('change', function (e) {
            if(this.checked) {
                resTypeIdTextBox.removeAttribute("disabled");
            } 
        });
        var resType1 = document.getElementById('resourceType1');
        var resType2 = document.getElementById('resourceType2');
        resType1.addEventListener('change', function (e) {
            if (this.checked) {
                resTypeIdTextBox.setAttribute("disabled","disabled");
            }
        });
        resType2.addEventListener('change', function (e) {
            if (this.checked) {
                resTypeIdTextBox.setAttribute("disabled","disabled");
            }
        });
        var unfilledId5 = document.getElementById('unfilled5');
        var unfilledIdTextBox = document.getElementById('unfilledOther');
        unfilledIdTextBox.setAttribute("disabled","disabled");
        unfilledId5.addEventListener('change', function (e) {
            if(this.checked) {
                unfilledIdTextBox.removeAttribute("disabled");
            } 
        });
        // UNFILLED SECTION - LOOKS UGLY. FIX IN FUTURE. BRUTE FORCED.
        var unfilledId1 = document.getElementById('unfilled1');
        var unfilledId2 = document.getElementById('unfilled2');
        var unfilledId3 = document.getElementById('unfilled3');
        var unfilledId4 = document.getElementById('unfilled4');

        unfilledId1.addEventListener('change', function (e) {
            if (this.checked) {
                unfilledIdTextBox.setAttribute("disabled","disabled");
            }
        });
        unfilledId2.addEventListener('change', function (e) {
            if (this.checked) {
                unfilledIdTextBox.setAttribute("disabled","disabled");
            }
        });
        unfilledId3.addEventListener('change', function (e) {
            if (this.checked) {
                unfilledIdTextBox.setAttribute("disabled","disabled");
            }
        });
        unfilledId4.addEventListener('change', function (e) {
            if (this.checked) {
                unfilledIdTextBox.setAttribute("disabled","disabled");
            }
        });
        // This sections is brute forced. Looks very ugly. Fix in the future. 

    </script>
</body>

</html>