<template>
    <div>
        <div class="">
            <input type="hidden" class="id" id="id" name="id" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="name form-control"
                name="name"
                id="name"
                placeholder="James"
            />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                class="email form-control"
                name="email"
                id="email"
                placeholder="name@example.com"
            />
        </div>
    </div>
</template>
<script>
export default {};
</script>
