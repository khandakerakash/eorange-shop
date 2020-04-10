import React, {Component} from 'react';
import {GetMainProductImage} from '../actions';
import { connect } from 'react-redux';
import  _ from 'lodash';


class SelectedCategoryFull extends Component {



    generateCatName =  ()=>{

        if(this.props.isCategory){
            return this.props.selectCategory.cat_name;


        }else if(this.props.isSubCategory){

            return this.props.selectCategory.sub_name;

        }else if(this.props.isChildCategory){

           return  this.props.selectCategory.child_name
        }

    }
    render() {

        return (
            <div className="category-page-headings" style={ { height:'230px',backgroundImage: `url(/assets/images/${
                this.props.selectedImage==null?gs.bgimg:this.props.selectedImage})` }}>
                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 text-center">
                            <h1>{this.generateCatName()}</h1>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}



function mapStateToProps(state) {
    return {
        selectCategory: state.CategoryList.selectedCategory,
        isCategory:state.CategoryList.isCategory,
        isSubCategory:state.CategoryList.isSubCategory,
        isChildCategory:state.CategoryList.isChildCategory,
        selectedImage:state.CategoryList.selectedImage
    };
}

export default connect(mapStateToProps)(SelectedCategoryFull);






