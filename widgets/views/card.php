<style>

    .border {
        width: 300px;
        margin: 0;
        background: white;
        padding: 20px;
        border: 1px solid #F1E7E8;
    }

    .border:hover .product-wrap:after {
        opacity: 1;
        transform: scale(1);
    }

    .border:hover {opacity: 1;}

    .border:hover {border-color: #4966A2;}
    .product-info {padding-top: 15px;}
    .stars {
        font-size: 14px;
        font-family: FontAwesome;
    }
    .stars:before {
        content: "\f005\f005\f005\f005\f123";
        color: #F2453E;
    }
    .product-title {
        font-weight: normal;
        font-family: "Open Sans";
        color: #162546;
        font-size: 18px;
    }
    .product {
        font-family: "Open Sans";
        color: #162546;
        font-style: italic;
        font-weight: bold;
    }
</style>


<div class="border">
    <div class="wrap">
        <div class="product-wrap">
            <h4 class="card-title"><?=$model['description']?></h4>
        </div>
    </div>
    <div class="product-info">
        <div class="stars"></div>
        <h3 class="product-title">Создатель:</h3>
        <div class="product"><?=$model->usercr->username?></div>
        <h3 class="product-title">Ответственный:</h3>
        <div class="product"><?=$model->userres->username?></div>
        <h3 class="product-title">Срок выполнения:</h3>
        <div class="product"><?=$model['deadline']?></div>
        <h3 class="product-title">Текущий статус:</h3>
        <div class="product"><?=$model->status->name?></div>
    </div>
</div>



