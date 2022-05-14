## e-commerce mobile application
This project is the leading training project @MegaTrust company.
This project aims to provide a platform that connects sellers and buyers, which facilitates shopping for buyers and offers a modern way to shop instead of the traditional brick-and-mortar way.
Fronted built with flutter repo link: https://github.com/gmgm60/e-commerce.git the project consists of the following:-

Applied repository pattern and custom request.
### Dashboard
Within the dashboard, the admin can create/view/edit/delete sellers, products, and categories, and also can view all orders with their current status and change order status.

#### APIs were consumed in a mobile app using (flutter).
#### Total of six controllers (repositories) detailed breakdown:-
##### AuthController consists of four end points (register,login,forgot_password & logout)

* Register API endpoint will create a new user success case returns the created user data, authentication token, and status code 200.

* Login API endpoint authenticates if the user exists or not in case of success it will return login token and status code 200, in case of failure it will throw a message "The provided credentials are incorrect."

* Logout API endpoint will destroy the current logged in user token and return a message "Successfully logged out"

* Forgot password API endpoint takes user-submitted email and validates it if it exists in case of success sends an email with the forgot password reset link in case of failure returns a message error email doesn't exist.

##### ProductController consists of two end points (index & show($id))

* Index API endpoint in case of success returns a list of all the current stored products in the database, in case of failure it returns a message "No products were found"

* Show by id endpoint takes a single product id and in case of success it will show a single product detail in case of failure it will return a message "Product not found".

##### SellerController consists of two end points (index & seller_prod($id))

* Index API endpoint in case of success returns a list of all the current stored sellers in the database, in case of failure it returns a message "Error data not found"

* Seller_prod($id) endpoint takes a single seller id and in case of success it returns the stored products which are sold by the provided seller id, in case of failure it will return a message "Error invalid seller".

##### CategoryController has 1 api (relatedProducts($id)

* RelatedProducts($id) endpoint takes a single category id and in case of success it returns a list of the products that exist in the specified category id, in case of failure it will return a message saying"Category not found"

##### CartController consits of 3 end points (addToCart, UserCart & delete)

* AddToCart endpoint takes product id, and quantity & will fetch user id from Auth(), in case the product id already exists in the database within the cart table then product quantity will be modified in case it doesn`t exist then a new cart will be created.

* UserCart endpoint in case of success returns a list of the products stored in the database within the cart table for the logged-in user which fetches the user id from Auth(), in case of success it will return a products list and a message "Success" in case of failure it will return a message "No cart available"

* delete endpoint fetches user id from Auth() alongside with the wished product id to be deleted in case of success returns a message "Deleted Successfully" in case of failure returns a message "Failed to delete".

##### OrderController consits of 2 end points (store & index)

* the store endpoint takes the user id from Auth(), shipping address, and a default status "pending" also the total price which is calculated based on the product's current price within the products table in database success will return stored order id with a list of the ordered products also it will delete cart rows related to that order from the cart table in the database.

* index endpoint fetches user id from Auth(), in case of success it will return a list of the created orders for the specified user id in case of failure it will return a message "No available orders"


### Packages
Sanctum package used in the project for login/register & logout authentication.

#### Cheers,
