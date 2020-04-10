import axios from 'axios';

const apiUrl = '/api/categories';


export const listCategories = () => {
    return async (dispatch) => {
        try {
            const data = await axios
                .get(apiUrl)
                .then(res => res.data);


            dispatch({
                type: "FETCH_CATEGORY",
                payload: data,
            })
        } catch (err) {
            dispatch({
                type: "UPDATE_ERRORS",
                payload: [
                    {
                        code: 735,
                        message: err.message,
                    },
                ],
            })
        }
    };

}


export const categoryProduct = (slug,page=1) => {

    return async (dispatch) => {
        try {
            const data = await axios
                .get(`/api/category/${slug}?page=${page}`)
                .then(res => res.data);

            dispatch({
                type: "CATEGORY_PRODUCT",
                payload: data,
            })
        } catch (err) {
            dispatch({
                type: "UPDATE_ERRORS",
                payload: [
                    {
                        code: 735,
                        message: err.message,
                    },
                ],
            })
        }
    };

}

export const categoryProductSorting = (slug,sort,page) => {
    return async (dispatch) => {
        try {
            const data = await axios
                .get(`/api/sort/${slug}/${sort}?page=${page}`)
                .then(res => res.data);



            dispatch({
                type: "CATEGORY_PRODUCT",
                payload: data,
            })
        } catch (err) {
            dispatch({
                type: "UPDATE_ERRORS",
                payload: [
                    {
                        code: 735,
                        message: err.message,
                    },
                ],
            })
        }
    };

}

export const categoryProductPriceFilter = (slug,min,max,page) => {
    return async (dispatch) => {
        try {
            const data = await axios
                .get(`/api/category/${slug}/${min}/${max}?page=${page}`)
                .then(res => res.data);


            dispatch({
                type: "CATEGORY_PRODUCT",
                payload: data,
            })
        } catch (err) {
            dispatch({
                type: "UPDATE_ERRORS",
                payload: [
                    {
                        code: 735,
                        message: err.message,
                    },
                ],
            })
        }
    };

}






