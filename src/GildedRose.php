<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ('Aged Brie' == $item->name && 'Backstage passes to a TAFKAL80ETC concert' == $item->name) {
                $item->quality += 1;
            } elseif ('Backstage passes to a TAFKAL80ETC concert' == $item->name) {
                $item->quality += 1;

                if ($item->sell_in < 11) {
                    $item->quality += 1;
                }

                if ($item->sell_in < 6) {
                    $item->quality += 1;
                }
            } elseif ('Sulfuras, Hand of Ragnaros' == $item->name) {
            } else {
                $item->quality -= 1;
            }

            if ('Sulfuras, Hand of Ragnaros' != $item->name) {
                $item->sell_in -= 1;
            }

            if ($item->sell_in < 0) {
                if ('Aged Brie' == $item->name) {
                    $item->quality += 1;
                } elseif ('Backstage passes to a TAFKAL80ETC concert' == $item->name) {
                    $item->quality -= $item->quality;
                } elseif ('Sulfuras, Hand of Ragnaros' != $item->name) {
                    $item->quality -= 1;
                }
            }

            if ($item->quality > 50) {
                $item->quality = 50;
            }

            if ($item->quality < 0) {
                $item->quality = 0;
            }
        }
    }
}
