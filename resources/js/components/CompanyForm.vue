<template>
    <div>
        <div class="">
            <input type="hidden" id="id" name="id" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="James"
            />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="name@example.com"
            />
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo</label>
            <input
                type="file"
                class="form-control"
                name="logo"
                id="logo"
                accept="image/*"
            />
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Company Url</label>
            <input
                type="text"
                class="form-control"
                name="url"
                id="url"
                placeholder="Url"
            />
        </div>
    </div>
</template>
<script>
export default {};
</script>
