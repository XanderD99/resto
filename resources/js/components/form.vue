<template>
    <form id="review-form" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <textarea name="review" placeholder="Review"></textarea>
        <input type="submit" value="submit">
    </form>
</template>

<script>
export default {
    props: ["csrf"],
    data() {
        return {
            action: this.action
        };
    },
};
</script>