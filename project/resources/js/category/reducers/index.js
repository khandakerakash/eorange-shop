import {combineReducers} from 'redux';
import {listCategories, categoryProduct} from '../actions/index';

var data = {
    categories: [],
    products: [],
    selectedCategory: {},
    selectedImage: null,
    currentPage: 1,
    pageCount: 1,
};
const categoryReducer = (state = data, action) => {
    let newState;
    switch (action.type) {
        case "FETCH_CATEGORY":
            return Object.assign({}, state,
                {
                    categories: action.payload
                }
            );


        // case "CATEGORY_MAIN_IMAGE":
        //     return Object.assign({}, state,
        //         {
        //             selectedImage: action.payload
        //         }
        //     );
        //
        case "CATEGORY_PRODUCT":

            return Object.assign({}, state,
                {
                    selectedCategory: action.payload.cat,
                    products: action.payload.products.data,
                    currentPage: action.payload.products.current_page,
                    pageCount: action.payload.products.last_page,
                    selectedImage: action.payload.image

                }
            );

        default:
            return state;
    }

}

export default combineReducers({
    CategoryList: categoryReducer
});