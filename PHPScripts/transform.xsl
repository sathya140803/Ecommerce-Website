<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes" />

    <xsl:template match="/games">
        <div id="search-results">
            <xsl:for-each select="game">
                <div class="game-result" style="margin-top: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                    <img src="/admin_area/{image}" alt="{title}" class="game-image" style="width: 100px; height: 100px; margin-right: 10px; float: left;"/>
                    <h3 class="game-title" style="color: #333; font-size: 1.2em; margin: 0;">
                        <xsl:value-of select="title" />
                    </h3>
                </div>
            </xsl:for-each>
        </div>
    </xsl:template>
</xsl:stylesheet>
