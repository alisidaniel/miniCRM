<template>
    <div>
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
            <label for="company" class="form-label">Assign company</label>
            <select class="form-control" name="company" id="company">
                <option v-for="company in companies" :value="company.id">{{
                    company.name
                }}</option>
            </select>
        </div>
    </div>
</template>
<script>
export default {
    props: ["companies"],

    data() {
        // return
    }
};
</script>
