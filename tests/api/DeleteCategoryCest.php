<?php


class DeleteCategoryCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function deleteCategory(ApiTester $I)
    {
        $I->sendDELETE('/categories/560f1a36-f580-11e7-b73d-d43d7e54900e');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::NO_CONTENT);
        $I->dontSeeInDatabase('categories', ['name' => 'Category 1']);
    }
}
