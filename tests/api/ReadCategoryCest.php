<?php


class ReadCategoryCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function listCategories(ApiTester $I)
    {
        $I->sendGET('/categories');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"Category 1"');
        $I->seeResponseContains('"name":"Category 2"');
        $I->seeResponseContains('"name":"Category 3"');
        $I->seeResponseContains('"name":"Sub category 3a"');
        $I->seeResponseContains('"name":"Sub category 3b"');
    }

    public function getCategoryById(ApiTester $I)
    {
        $I->sendGET('/categories/68cab932-10ee-46d0-b8f7-f1e2ccf445cb');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"Category 2"');
    }

    public function getCategoryBySlug(ApiTester $I)
    {
        $I->sendGET('/categories/sub3a');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"Sub category 3a"');
    }

    public function getCategoryWithChildren(ApiTester $I)
    {
        $I->sendGET('/categories/cat3?expand=children');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"Category 3"');
        $I->seeResponseContains('"name":"Sub category 3a"');
        $I->seeResponseContains('"name":"Sub category 3b"');
    }

    public function getCategoryWithParent(ApiTester $I)
    {
        $I->sendGET('/categories/sub3a?expand=parent');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"Category 3"');
        $I->seeResponseContains('"name":"Sub category 3a"');
        $I->dontSeeResponseContains('"name":"Sub category 3b"');
    }
}
