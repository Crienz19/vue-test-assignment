<script setup>

</script>

<template>
    <div
        class="btn-group my-2"
        role="group"
        aria-label="Button group with nested dropdown"
    >
        <div class="btn-group" role="group">
            <button
                id="btnGroupDrop1"
                type="button"
                class="btn btn-secondary dropdown-toggle"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                File
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a @click="$emit('handleNew')" class="dropdown-item" >New</a>
                <a @click="$emit('handleOpen')" class="dropdown-item" >Open</a>
                <a @click="$emit('handleSave')" class="dropdown-item" >Save</a>
                <a @click="$emit('handleSaveAs')" class="dropdown-item" >Save As...</a>
            </div>
        </div>
        <div class="btn-group" role="group">
            <button
                id="btnGroupDrop1"
                type="button"
                class="btn btn-secondary dropdown-toggle"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Edit
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Dropdown link</a>
                <a class="dropdown-item" href="#">Dropdown link</a>
            </div>
        </div>
    </div>
</template>
