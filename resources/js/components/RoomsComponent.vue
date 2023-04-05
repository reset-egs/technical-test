<template>
    <div class="card-body">
        <h5 class="card-title">Available rooms</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="room in rooms" :key="room.id">
                    <td>{{ room.name }}</td>
                    <td>{{ room.number_of_people }}</td>
                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            :data-room="encodeURIComponent(JSON.stringify(room))">Reserve</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        rooms: {
            type:Array,
            required: true,
        },
    },
};
</script>