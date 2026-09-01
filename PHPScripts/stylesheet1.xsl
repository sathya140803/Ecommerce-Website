<?xml version="1.0" encoding="UTF-8"?>  
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">  
    <xsl:output method="html" encoding="UTF-8" indent="yes" />  
    
    <xsl:template match="/cart">  
        <div class="cart-items-list">  
            <xsl:choose>
                <xsl:when test="count(*) = 0">
                    <div class="empty-cart-message">No games found!</div>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="*" />
                </xsl:otherwise>
            </xsl:choose>
        </div>  
    </xsl:template>  

    <xsl:template match="*[game_id]">  
        <div class="cart-item" data-game-id="{game_id}">  
            <img src="../admin_area/{game_image1}" alt="{game_title}" class="cart-item-image" />  
            <div class="cart-item-details">
                <h5 class="cart-item-title"><xsl:value-of select="game_title" /></h5>  
                <p class="cart-item-price">$<xsl:value-of select="game_price" /></p>  
                <xsl:if test="quantity">
                    <p class="cart-item-quantity">Quantity: <xsl:value-of select="quantity" /></p>  
                </xsl:if>
                <!-- Fixed the button element with proper attribute syntax -->
                <button class="btn btn-danger remove-btn">
                    <xsl:attribute name="onclick">
                        removeFromCart(<xsl:value-of select="game_id" />)
                    </xsl:attribute>
                    Remove
                </button>  
            </div>
            <hr/>  
        </div>  
    </xsl:template>  
</xsl:stylesheet>