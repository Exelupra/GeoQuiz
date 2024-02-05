<template>
    <div class="game">
        <div class="game_info">
            <h3>Score: </h3>
            <h3>Temps restant: 00</h3>
        </div>
        <div class="game_map">
            <div id="img">JPEG.PNG</div>
            <div id="map">MAP.JPEG</div>
        </div>
    </div>
</template>

<script>

</script>

<style scoped>

.game_map {
    border: 1px solid red;
    height: 500px;
    width: 100%;
    display: flex;
}

#img {
    width: 35%;
    height: 100%;
    border: 1px solid red;
}

#map {
    border: 1px solid red;
    width: 65%;
    height: 100%;
}

.game_info {
    width: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 10%;
    padding: 10px;
    background-color: #f2f2f2;
    color: black;
}

.game{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 95vh;
    width: 100%;
}

</style>