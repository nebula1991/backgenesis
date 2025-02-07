<template>
    <div>
        <h1>Principal</h1>
        <list/>
    </div>
</template>

<script>

import List from './components/ListComponent.vue';

export default {
    components: {
        'list': require('./components/ListComponent.vue')
    }
}


</script>