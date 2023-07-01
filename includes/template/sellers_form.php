<fieldset>
    <legend>General Information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" name="seller[name]" placeholder="Seller's name" value="<?php echo sanitize($seller->name);?>">

    <label for="lastName">last Name:</label>
    <input type="text" id="lastName" name="seller[lastName]" placeholder="Seller's  last name" value="<?php echo sanitize($seller->lastName);?>">

</fieldset>

<fieldset>
    <legend>Extra Information</legend>

    <label for="phone">Phone:</label>
    <input type="number" id="phone" name="seller[phone]" placeholder="Phone" value="<?php echo sanitize($seller->phone);?>">

</fieldset>
