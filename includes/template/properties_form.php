<fieldset>
    <legend>General Information</legend>

    <label for="title">Title:</label>
    <input type="text" id="title" name="property[title]" placeholder="Property title" value="<?php echo sanitize($property->title);?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="property[price]" placeholder="Property price" value="<?php echo sanitize($property->price);?>">

    <label for="image">Image:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="property[image]">

    <?php if($property->image)	{ ?>
        <img src="/Project_RealEstates/images/<?php	 echo $property->image;?>" class="image-small" alt="image-update"> 
    <?php }	?>    

    <label for="description">Description</label>
    <textarea id="description" name="property[description]"><?php echo sanitize($property->description);?></textarea>

</fieldset>

<fieldset>
    <legend>Property Information</legend>

    <label for="room">Rooms:</label>
    <input type="number" id="room" name="property[rooms]" placeholder="Ex: 3" min="1" max="9" value="<?php echo sanitize($property->rooms);?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" id="wc" name="property[wc]" placeholder="Ex: 3" min="1" max="9" value="<?php echo sanitize($property->wc);?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="property[parking]" placeholder="Ex: 3" min="1" max="9" value="<?php echo sanitize($property->parking);?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>

    <select name="property[sellers_id]" id="seller">
        <option value="" selected>--Select--</option>
        <?php foreach($sellers as $seller) { ?>
            <option <?php echo $property->sellers_id === $seller->id ? 'selected' : '';	?> value="<?php echo sanitize($seller->id);?>"><?php echo sanitize($seller->name) . " " . sanitize($seller->lastName); ?></option>
        <?php }; ?>
    </select>
</fieldset>
