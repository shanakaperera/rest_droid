<?php
/**
 * Created by PhpStorm.
 * User: Shanaka P
 * Date: 2016-12-25
 * Time: 11:29 AM
 */

namespace App\Http\Controllers;


use Base\CategoryQuery;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Map\ProductTableMap;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;

class ProductController extends Controller
{
    public function postSaveProduct()
    {

        $validator = Validator::make(Input::all(), [
            'p_name' => 'required',
            'p_price' => 'required'],
            [
                'p_name.required' => 'Product Name is required !',
                'p_price.required' => 'Product Price is required !'
            ]
        );

        if ($validator->passes()) {

            $imag_path = public_path() . '/images/products/';
            $img_folder = '/images/products/';

            if (Input::hasFile('p_image')) {

                $img = Image::make(Input::file('p_image')->getRealPath())->resize(128, 128);

            } else {
                $img = Image::make(public_path() . '/images/system/gallery_icon.png')->resize(128, 128);
            }

            $con = Propel::getWriteConnection(ProductTableMap::DATABASE_NAME);
            $con->beginTransaction();

            try {
                $category = CategoryQuery::create()
                    ->findOneById(Input::get('cat_id'));

                $product = new \Product();
                $product->setName(Input::get('p_name'))
                    ->setPrice(Input::get('p_price'))
                    ->setDateAdded(new \DateTime())
                    ->setDateUpdated(new \DateTime())
                    ->setDescription(Input::get('p_desc'))
                    ->setStatus(true)
                    ->setImage($img_folder . 'product_' . date_format(new \DateTime(), "Y-m-d-H-i") . '.png')
                    ->setUserId(Session::get('login_usr')->getId())
                    ->setCategoryId($category->getId())
                    ->setType(Input::get('p_type'))
                    ->save($con);

                $success = $con->commit();
                if ($success) {
                    Propel::closeConnections();
                    $img->save($imag_path . 'customer_' . date_format(new \DateTime(), "Y-m-d-H-i") . '.png');
                    return response()->json(['message' => 'Successfully Saved'], 200);
                }
            } catch (PropelException $ex) {
                $con->rollBack();
                Propel::closeConnections();
                return response()->json(['message' => 'Something went wrong'], 500);
            }

        } else {
            return response()->json(['message' => 'Missing Inputs !'], 500);
        }
        return null;
    }
}