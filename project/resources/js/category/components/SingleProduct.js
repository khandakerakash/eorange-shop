import React, {Component} from 'react';

import _ from 'lodash';
import Featured from "./Featured";
import axios from "axios/index";

class SingleProduct extends Component {
    state = {
        rating: 0
    }
    featuredProductPart = () => {
        if (this.props.product.features != null && this.props.product.colors != null) {
            const title = this.props.product.features.split(',');
            const details = this.props.product.colors.split(',');
            const output = title.map((t, index) => (
                <Featured key={index} title={t} color={details[index]}/>
            ));
            return (
                <div className="featured-tag" style={{"width": "100%"}}>
                    {output}
                </div>
            );

        } else {
            return null;
        }
    }
    productHoverArea = () => {

        return (
            <div className="product-hover-area">

                {isLogedIn == true ?

                    <span className="uwish"><i className="icofont">heart</i></span>

                    :
                    <span className="no-wish" data-toggle="modal" data-target="#loginModal">
                        <i className="icofont">heart</i>
                    </span>
                }
                <input type="hidden" defaultValue={this.props.product.id}/>
                <span className="wish-list" data-toggle="modal" data-target="#myModal"><i
                    className="icofont">eye</i></span>
                <span className="addcart"><i className="icofont">cart</i></span>
                <span><i className="icofont">exchange</i></span>
            </div>
        )
    }




    outputPrice = ()=>{
        const product = this.props.product;
        const pprice = product.pprice * curr.value;
        if(pprice!=0){
           return  (gs.sign == 0 ? curr.sign : "") + pprice.toFixed(2);

        }else{
            return "";
        }
    }

    render() {
        const product = this.props.product;
        const price = product.user_id != 0 ? product.cprice + gs.fixed_commission + (product.cprice / 100) * gs.percentage_commission :
            product.cprice * curr.value;



        return (

            <div className="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div className="category-product-item">
                    <a href={`/product/${product.id}/${_.replace(product.name, " ", "-")}`}
                       className="text-center">
                        <div className="category-product-item-image-area">
                            <img src={`/assets/images/${product.photo}`}
                                 alt="new arrival product" className="img-responsive div-mx"/>
                        </div>
                    </a>

                    <div className="category-product-item-content">
                        <a href={`/product/${product.id}/${_.replace(product.name, " ", "-")}`}
                           className="title">{product.name.substring(0, 50)}</a>
                        <p className="price">
                            {gs.sign == 0 ? curr.sign : ""}
                            {price.toFixed(2)}
                            <br/>


					<span>
					<del>
                        {this.outputPrice()}

					</del>
					</span>

                        </p>
                    </div>
                </div>

            </div>
        );
    }
}

SingleProduct.propTypes = {};

export default SingleProduct;
